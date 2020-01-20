const init = () => {
  test();
}

const test = () => {
  document.querySelectorAll('.longread__section__information').forEach(button => {
    button.removeAttribute('title');
    button.addEventListener('mouseenter', handleHoverInfo);
    button.addEventListener('mouseleave', handleHoverLeaveInfo);
  })
}

const handleHoverInfo = e => {
  const target = e.currentTarget;

  const explain = target.nextElementSibling;
  explain.style.display = 'block';
  if(window.innerWidth <= 500) {
    if(e.clientX > window.innerWidth/2) {
      explain.style.right = `${e.clientX/window.innerWidth + 120}px`;
    } else {
      explain.style.right = `${e.clientX/window.innerWidth - 70}px`;
    }
  } else {
    if(e.clientX > window.innerWidth/2) {
      explain.style.left = `${((e.clientX/window.innerWidth)*100)- 20}vw`;
    } else {
      explain.style.left = `${((e.clientX/window.innerWidth)*100) + 3}vw`;
    }
  }
  explain.style.top = `${e.clientY - 100}px`;
}

const handleHoverLeaveInfo = e => {
  const target = e.currentTarget;
  const explain = target.nextElementSibling;
  explain.style.display = 'none';
}



init();
