import './bootstrap.js';
import './styles/app.css'
import alienGreeting from './lib/alien-greeting.js';
import * as Turbo from '@hotwired/turbo';

alienGreeting('Give us all your candy!', false);
console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');
// Turbo.session.drive = false;
