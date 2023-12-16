import '../styles/alien-greeting.css';

export  default function (message, inPeace = false) {
  console.log(`${message}! ${inPeace ? '👽' : '👾'}`);
}