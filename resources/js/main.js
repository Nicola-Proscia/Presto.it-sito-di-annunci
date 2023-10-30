const labels = document.querySelectorAll(".form-control-cus label");

labels.forEach((label) => {  
  label.innerHTML = label.innerText /* get the inner text of the label */
  .split("") /* split the string into an array of characters */
  .map(  /* map over the array of characters */
  (letter, idx) =>  /* for each character */
  `<span style="transition-delay:${idx * 50}ms">${letter}</span>` /* insert the character into the span*/
  )
  .join(""); /* join the array into a string */
});


// ? carosello


//*? catturo gli span per poter incrementare i numerini negli span, grazie al setInterval
function createInterval(finalNumber, element){
  
  let counter = 0;
  
  let interval = setInterval(()=>{
    
    
    if(counter < finalNumber){
      counter++
      element.innerHTML = counter
      // console.log(counter);
      
    } else{
      
      clearInterval(interval);
    }
    
  }, 0.5);
  
}

// catturo gli span per poter incrementare i numerini negli span, grazie al setInterval creato su

let firstSpan = document.querySelector('#firstSpan');

let secondSpan = document.querySelector('#secondSpan');

let thirdSpan = document.querySelector('#thirdSpan');

// createInterval();

let numeriIntersection = document.querySelector('#numeriIntersection');

// variabile d'appoggio per bloccare incremento numeri

let intersectionInterval = true;

let observer = new IntersectionObserver(
  
  (entries)=>{
    entries.forEach((entry)=>{
      
      if(entry.isIntersecting && intersectionInterval == true){
        createInterval(490, firstSpan);
        createInterval(98, secondSpan);
        createInterval(500, thirdSpan);
        intersectionInterval = false;
      }
      
    })
    
  }
  
  )
  observer.observe(numeriIntersection);
  
  
  // Barra ricerca

  