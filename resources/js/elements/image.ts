export class EnvyImage extends HTMLImageElement {
    static counter: number = 0;

    
    #identifier: string = '';
    #action: string = '';
    #errored: boolean = false;

    #catch = () => {};
    #action_on_error = () => {};

    constructor(){
        super()
        
        EnvyImage.counter++
        this.#identifier = `Envy Image ${EnvyImage.counter}`;

        this.#catch = () => {
            console.log(`${this.#identifier} - Image not found.`);
            this.#action_on_error();
        }
    }

    connectedCallback() {
        console.groupCollapsed(this.#identifier);
        console.log(this);

        this.#action = this.getAttribute("envy-action") ?? '';
        this.#errored = this.getAttribute("errored") == 'true';
        
        if( this.#action === "error-switch-next" ) {
            console.log("Valid action found...");
            console.log("Switch for next Sibling on Error detected");
            
            // add action for when img errors
            this.#action_on_error = () => {
                this.classList.add('hidden');
                this.nextElementSibling?.classList.remove('hidden');
            }
        }
        else {
            console.log("No valid action found...");
        }

        if(this.#errored) this.#catch();
        else this.onerror = () => this.#catch();

        console.groupEnd();
    }

    attributeChangedCallback(name, oldValue, newValue) {
        console.log(`Attribute ${name} has changed.`);
    }

}