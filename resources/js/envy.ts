console.log('Envy JS Live');

import { EnvyButton } from './elements/button';
import { EnvyImage } from './elements/image';

customElements.define("envy-button", EnvyButton, { extends: 'button' });
customElements.define("envy-image", EnvyImage, { extends: 'img' });
