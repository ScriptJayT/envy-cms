
export class EnvyButton extends HTMLButtonElement {
    static counter: number = 0;
    
    #toggle_type;
    #copy_content;

    #identifier: string;
    #element_enabled: boolean = false;
    #valid_actions: string[] = [
        'default', 'toggle', 'copy',
    ];

    #action_type: string;
    #target: HTMLInputElement;

    constructor() {
        EnvyButton.counter++;
        super();

        this.#identifier = `Envy Button ${EnvyButton.counter}`;

        this.#toggle_type = (_ev: EventListenerObject): void => {
            const states = ['text', 'password'];
            const current_state = this.#target.type;
            
            if( _ev instanceof KeyboardEvent ) {
                // only toggle on alt+rightArrow
                if( _ev.key == 'ArrowRight' && _ev.altKey ) {
                    _ev.preventDefault();
                    _ev.stopImmediatePropagation();
                    _ev.stopPropagation();
                    console.log(`shortcut activated for <<${this.#identifier}>>, toggling...`);
                }
                else return;
            }   
            else if( _ev instanceof PointerEvent ) {
                this.#target.focus();
                console.log(`button clicked for <<${this.#identifier}>>, toggling...`);
            }
            else 
                console.log(`Unhandled Eventlistener for <<${this.#identifier}>>`);

            const new_state = (states.indexOf(current_state) + 1) % states.length;
            
            this.#target.type = states[new_state];
        }
        this.#copy_content = () => {};
    }
    
    connectedCallback() {
        console.log('button connected');

        this.#action_type = this.getAttribute('envy-action') ?? 'default';
        
        if( this.#valid_actions.includes(this.#action_type) ) {
            console.groupCollapsed(this.#identifier);
            console.log(this);
            this.#setup();
            console.groupEnd();
        }
    }

    #get_target(): boolean {
        const i = this.previousElementSibling;
        if( !i ) return false;
        if( i.tagName.toLowerCase() !== 'input' ) return false;
        this.#target = i as HTMLInputElement;
        return true;
    }

    #setup(): void {
        console.log('valid action found...');

        if( this.#action_type === 'copy' ) {
            console.log('copy button detected');
            this.#setup_copy();
        }
        else if( this.#action_type === 'toggle' ) {
            console.log('toggle button detected');
            this.#setup_toggle();
        }
        else 
            console.log('simple button detected');
    }

    #setup_copy(): void { }

    #setup_toggle(): void {
        if( !this.#get_target() ) return;
        this.#element_enabled = true;

        this.#target.addEventListener('keydown', this.#toggle_type );
        this.addEventListener('click', this.#toggle_type );
    }

    disconnectedCallback() {
        // remove event listeners if element had been activated
        if( !this.#element_enabled ) return;

        if( this.#action_type === 'toggle' ) {
            this.#target.removeEventListener('keydown', this.#toggle_type);
            this.removeEventListener('click', this.#toggle_type );
        }
        else if( this.#action_type === 'copy' ) {
            this.removeEventListener('click', this.#copy_content );
        }
    }

    attributeChangedCallback() { }

    adoptedCallback() { }
}