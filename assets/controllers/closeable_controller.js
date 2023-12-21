import {Controller} from '@hotwired/stimulus';
import { useTransition } from 'stimulus-use';

/* stimulusFetch: 'lazy' */
export default class extends Controller {
  static values = {
    autoClose: Number
  }

  static  targets = ['timerbar']

  connect() {
    useTransition(this, {
      leaveActive: 'transition ease-in duration-200',
      leaveFrom: 'opacity-100',
      leaveTo: 'opacity-0',
      transitioned: true,
    });

    if (this.autoCloseValue) {
      setTimeout(() => {
        this.close()
      }, this.autoCloseValue)
    }

    if (this.hasTimerbarTarget) {
      setTimeout(() => {
        this.timerbarTarget.style.width = 0;
      })
    }
  }

  close() {
    this.leave();
  }
}
