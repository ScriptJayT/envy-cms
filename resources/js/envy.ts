console.log('JS Live');

import { EnvyButton } from './elements/button';
customElements.define("envy-button", EnvyButton, { extends: 'button' });
