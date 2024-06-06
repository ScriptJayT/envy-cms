import { $query } from '../helpers';

export class EnvyButton extends HTMLButtonElement {
    static counter: number = 0;
    static observedAttributes: string[] = [];

    // input fns
    #toggle_type;
    #copy_content;
    #generate_content;
    // dialog fns
    #open_dialog;
    #close_dialog;

    #identifier: string;
    #element_enabled: boolean = false;
    #valid_actions: string[] = [
        'default', 
        'toggle-input', 'copy-input',
        'open-dialog', 'close-dialog'
    ];

    #action_type: string;
    #target: HTMLElement;

    constructor() {
        EnvyButton.counter++;
        super();

        this.#identifier = `Envy Button ${EnvyButton.counter}`;

        // input related
        this.#toggle_type = (_ev: EventListenerObject): void => {
            const t = this.#target as HTMLInputElement;
            const states = ['text', 'password'];
            const current_state = t.type;
            
            if( _ev instanceof KeyboardEvent ) {
                // only toggle on alt+rightArrow
                if( _ev.key !== 'ArrowRight' || !_ev.altKey ) return

                _ev.preventDefault();
                _ev.stopImmediatePropagation();
                _ev.stopPropagation();
                console.log(`EVENT[keyboard] <<${this.#identifier}>> Type toggled`);
            }   
            else if( _ev instanceof PointerEvent ) {
                this.#target.focus();
                console.log(`EVENT[click] <<${this.#identifier}>> Type toggled`);
            }
            else 
                return console.log(`EVENT[unhandled] <<${this.#identifier}>> Type not toggled`);

            t.type = states[(states.indexOf(current_state) + 1) % states.length];
        }
        this.#copy_content = () => {
            const t = this.#target as HTMLInputElement;
            console.log(`EVENT[click] <<${this.#identifier}>> Input value copied`);
            navigator.clipboard.writeText(`${t.value}`);
        };

        // dialog related
        this.#open_dialog = () => {
            const t = this.#target as HTMLDialogElement;
            if(!t.open) t.showModal();
        };
        this.#close_dialog = () => {
            const t = this.#target as HTMLDialogElement;
            if(t.open) t.close();
        }
    }
    
    connectedCallback() {
        this.#action_type = this.getAttribute('envy-action') ?? 'default';
        
        if( !this.#valid_actions.includes(this.#action_type) )
            return console.log('No valid action found', this.#action_type)
        
        console.groupCollapsed(this.#identifier);
        console.log(this);
        console.log('Valid action found...');
        this.#setup();
        console.groupEnd();
    }

    #get_target_input(): boolean {
        const i = this.previousElementSibling;
        if( !i ) return false;
        if( i.tagName.toLowerCase() !== 'input' ) return false;
        this.#target = i as HTMLInputElement;
        return true;
    }

    #get_target_by_id(): boolean {
        const q = this.getAttribute("data-target") ?? '';
        const x = $query(`[data-id='${q}']`);
        if(!x) return false;
        this.#target = x;
        return true;
    }

    #get_target_parent(_tag: string): boolean {
        const p = this.closest(_tag);
        if(!p) return false
        this.#target = p as HTMLElement;
        return true;
    }

    #setup(): void {
        // inputs
        if( this.#action_type === 'toggle-input' ) {
            console.log('<Toggle Input Type button> detected');
            this.#setup_toggle();
        }
        // else if( this.#action_type === 'generate' ) {
        //     console.log('<Generate button> detected');
        //     this.#setup_generate();
        // }
        else if( this.#action_type === 'copy-input' ) {
            console.log('<Copy Input button> detected');
            this.#setup_copy();
        }
        // dialogs
        else if( this.#action_type === 'open-dialog' ) {
            console.log('<Open Dialog button> detected');
            this.#setup_dialog();
        }
        else if( this.#action_type === 'close-dialog' ) {
            console.log('<Close Dialog button> detected');
            this.#setup_dialog(true);
        }
        else 
            console.log('No implementation yet');
    }

    #setup_copy(): void { 
        if( !this.#get_target_input() ) return;
        this.#element_enabled = true;
        this.addEventListener('click', this.#copy_content );
    }

    #setup_generate(): void { 
        console.log("TODO");
    }

    #setup_toggle(): void {
        if( !this.#get_target_input() ) return;
        this.#element_enabled = true;

        this.#target.addEventListener('keydown', this.#toggle_type );
        this.addEventListener('click', this.#toggle_type );
    }

    #setup_dialog(_close_dia: boolean = false): void {
        if(_close_dia) {
            if( !this.#get_target_parent('dialog') ) return;
            this.#element_enabled = true;
            this.addEventListener("click", this.#close_dialog);
        }
        else {
            if( !this.#get_target_by_id() ) return;
            this.#element_enabled = true;
            this.addEventListener("click", this.#open_dialog);
        }
    }

    disconnectedCallback() {
        // remove event listeners if element had been activated
        if( !this.#element_enabled ) return;

        // inputs
        if( this.#action_type === 'toggle-input' ) {
            this.#target.removeEventListener('keydown', this.#toggle_type);
            this.removeEventListener('click', this.#toggle_type );
        }
        else if( this.#action_type === 'copy-input' ) {
            this.removeEventListener('click', this.#copy_content );
        }
        // else if( this.#action_type === 'generate' ) {
            // this.removeEventListener('click', this.#generate_content );
        // }
        // dialogs
        else if( this.#action_type === 'open-dialog' ) {
            this.removeEventListener('click', this.#open_dialog );
        }
        else if( this.#action_type === 'close-dialog' ) {
            this.removeEventListener('click', this.#close_dialog );
        }
    }

    attributeChangedCallback() { }

    adoptedCallback() { }
}