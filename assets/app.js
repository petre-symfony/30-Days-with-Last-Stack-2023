import './bootstrap.js';
import './styles/app.css'
import alienGreeting from './lib/alien-greeting.js';
//import * as Turbo from '@hotwired/turbo';
import { shouldPerformTransition, performTransition } from "turbo-view-transitions";

alienGreeting('Give us all your candy!', false);
console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');
// Turbo.session.drive = false;

document.addEventListener("turbo:before-render", (event) => {
  if (shouldPerformTransition()) {
    event.preventDefault();

    performTransition(document.body, event.detail.newBody, async () => {
      await event.detail.resume();
    });
  }
});

document.addEventListener("turbo:load", () => {
  // View Transitions don't play nicely with Turbo cache
  if (shouldPerformTransition()) Turbo.cache.exemptPageFromCache();
});
