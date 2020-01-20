const init = () => {
  const $fullscreen = document.querySelector('.longread__header__fullscreen');
  const $exitFfullscreen = document.querySelector('.longread__header__exitfullscreen');
  if($fullscreen) {
    $fullscreen.addEventListener('click', handleClickFullScreen);
  }
  if($exitFfullscreen) {
    $exitFfullscreen.addEventListener('click', handleClickExitFullScreen);
  }
  interactiveImages();
}

const handleClickFullScreen = e => {
  e.preventDefault();
  console.log('open');
  const $btn = e.currentTarget;
  $btn.style.display = 'none';
  const $exitFfullscreen = document.querySelector('.longread__header__exitfullscreen');
  $exitFfullscreen.style.display = 'block';
  $exitFfullscreen.addEventListener('click', handleClickExitFullScreen);
  const doc = document.documentElement;
  if (doc.requestFullscreen) {
    doc.requestFullscreen();
  } else if (doc.mozRequestFullScreen) { /* Firefox */
    doc.mozRequestFullScreen();
  } else if (doc.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
    doc.webkitRequestFullscreen();
  } else if (doc.msRequestFullscreen) { /* IE/Edge */
    doc.msRequestFullscreen();
  }
}

const handleClickExitFullScreen = e => {
  console.log('close mf');
  e.preventDefault();
  const $btn = e.currentTarget;
  $btn.style.display = 'none';
  const $fullscreen = document.querySelector('.longread__header__fullscreen');
  $fullscreen.style.display = 'block';
  if (document.exitFullscreen) {
		document.exitFullscreen();
	} else if (document.webkitExitFullscreen) {
		document.webkitExitFullscreen();
	} else if (document.mozCancelFullScreen) {
		document.mozCancelFullScreen();
	} else if (document.msExitFullscreen) {
		document.msExitFullscreen();
	}
}

const interactiveImages = () => {
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
