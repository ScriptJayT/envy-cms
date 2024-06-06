export class EnvyImage extends HTMLImageElement {
    static counter: number = 0;
    static observedAttributes: string[] = ['errored'];
    
    #identifier: string = '';
    #action: string = '';
    #setup: boolean = false;

    #catch = () => console.log("unset catch method", this.#setup);

    constructor(){
        super()
        
        EnvyImage.counter++
        this.#identifier = `Envy Image ${EnvyImage.counter}`;
    }

    connectedCallback() {
        console.groupCollapsed(this.#identifier);
        console.log(this);

        this.#action = this.getAttribute("envy-action") ?? '';
        
        if( this.#action === "error-switch-next" ) {
            console.log("Valid action found...");
            console.log("Switch for next Sibling on Error detected");
            
            // set action for when img errors
            this.#catch = () => {
                console.log(`EVENT <<${this.#identifier}>> Catch fired`);
                this.classList.add('hidden');
                this.nextElementSibling?.classList.remove('hidden');
            }
        }
        else {
            console.log("No valid action found...");
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

        console.log(`EVENT <<${this.#identifier}>> Attribute <${_name}> changed from <${_old}> to <${_new}>`);
        
        if(_name == "errored" && _new == 'true') this.#catch();
    }

}