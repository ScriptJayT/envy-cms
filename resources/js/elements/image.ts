export class EnvyImage extends HTMLImageElement {
    static counter: number = 0;
    static observedAttributes: string[] = ['errored'];
    
    #identifier: string = '';
    #action: string = '';
    #setup: boolean = false;

    #valid_actions: string[] = [
        'error-switch-next', 
    ];

    #catch = () => console.log("unset catch method", this.#setup);

    constructor(){
        super()
        
        EnvyImage.counter++
        this.#identifier = `Envy Image ${EnvyImage.counter}`;
    }

    connectedCallback() {
        this.#action = this.getAttribute("envy-action") ?? '';
        
        if( !this.#valid_actions.includes(this.#action) )
            return console.log("No valid action found");
            
        console.groupCollapsed(this.#identifier);
        console.log(this);
        console.log("Valid action found...");

        if( this.#action === "error-switch-next" ) {
            console.log("<Switch for next Sibling on Error> detected");
            
            // set action for when img errors
            this.#catch = () => {
                console.log(`FN <<${this.#identifier}>> Catch fired`);
                this.classList.add('hidden');
                this.nextElementSibling?.classList.remove('hidden');
            }
        }

        console.groupEnd();
       
        // the attributeChangedCallback does not wait for the connectedCallback, 
        // so any methods may be used there before they are fully declared here
        // we prevent that by only allowing the attributeChangedCallback after the connectedCallback is established
        // so we need to manually check for attributes here first.
        if(this.getAttribute("errored") == 'true') this.#catch();

        this.#setup = true;
    }

    attributeChangedCallback(_name: string, _old: string, _new: string): void {
        // wait for the connectedCallback
        if(!this.#setup) return;

        console.log(`EVENT[attribute-change] <<${this.#identifier}>> Attribute <${_name}> changed from <${_old}> to <${_new}>`);
        
        if(_name == "errored" && _new == 'true') this.#catch();
    }

}