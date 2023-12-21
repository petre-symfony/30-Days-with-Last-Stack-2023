import {Controller} from '@hotwired/stimulus';

/* stimulusFetch: 'lazy' */
export default class extends Controller {
  static values = {
    autoClose: Number
  }

  static  targets = ['timerbar']

  connect() {
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
    this.element.remove();
  }
}
