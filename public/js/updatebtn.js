document.querySelector('#parent').addEventListener('click', (e)=>{
    let here=e.target.classList.contains('here');
   
    if (here) {
      e.target.classList.add('d-none');
      e.target.parentElement.nextElementSibling.children[2].classList.remove('d-none')
      e.target.parentElement.nextElementSibling.children[3].classList.remove('d-none')
    }
 
    
})