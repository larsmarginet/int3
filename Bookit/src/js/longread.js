import Role from './components/Role.js';

const init = () => {
  const $fullscreen = document.querySelector('.longread__header__fullscreen');
  const $exitFfullscreen = document.querySelector('.longread__header__exitfullscreen');
  if($fullscreen) {
    $fullscreen.addEventListener('click', handleClickFullScreen);
  }
  if($exitFfullscreen) {
    $exitFfullscreen.addEventListener('click', handleClickExitFullScreen);
  }
  const $showTopNum = document.querySelector('.showTop span');
  if($showTopNum){
    $showTopNum.textContent = '0';
  }
  const $copy = document.querySelector('.topbar__content__scrabbletray__copy');
  if($copy){
    $copy.addEventListener('click', handleClickCopy)
  }
  const $scrollDefs = document.querySelector('.longread__section__definitions__explain');
  if($scrollDefs){
    $scrollDefs.addEventListener('scroll', handleScrollDefs);
  }
  const $scrollLaws = document.querySelector('.longread__section__laws-wrapper');
  if($scrollLaws){
    $scrollLaws.addEventListener('scroll', handleScrollLaws);
  }
  const $scrollRoles = document.querySelector('.longread__section__roles__imgs');
  if($scrollRoles){
    $scrollRoles.addEventListener('scroll', handleScrollRoles);
  }
  const $submit = document.querySelector('.longread__wrapper');
  if($submit) {
    $submit.addEventListener('submit', handleSubmitRole);
  }
  document.querySelectorAll('.scrabble-tile').forEach($tile => $tile.addEventListener('click', handleClickTile));
  document.querySelectorAll('.topbar__content__scrabbletray__tiles__tile').forEach($tile => $tile.style.opacity = '0');
  document.querySelectorAll('.longread__section__img-fullscreen').forEach($btn => $btn.addEventListener('click', handleClickImgFullscreen));
  document.querySelectorAll('.longread__section__img-closefullscreen').forEach($btn => $btn.addEventListener('click', handleClickImgCloseFullscreen));
  interactiveImages();
}


const handleSubmitRole = e => {
  const $form = e.currentTarget;
  e.preventDefault();
  submitWithJS($form);
}


const submitWithJS = async (form) => {
  const $form = form;
  const data = new FormData($form);
  const entries = [...data.entries()];
  const qs = new URLSearchParams(entries).toString();
  const url = `${$form.getAttribute('action')}&${qs}`;
  const response = await fetch(url, {
      headers: new Headers({
        Accept: 'application/json'
      })
    });
  const roles = await response.json();
  showRole(roles, entries);
  window.history.pushState(
    {},
    '',
    `${url}`
  );
}


const showRole = (roles, data) => {
  let totalScore = 0;
  data.forEach(entry => {
    totalScore += parseFloat(entry['1']);
  })
  console.log(totalScore);
  let id = 1;
  if(data['5']['1'] == '3') {
    id = 10;
  } else if (data['5']['1'] == '2') {
    if(totalScore <= 8) {
      id = 6;
    } else {
      id = 8;
    }
  } else {
    if(totalScore <= 8) {
      id = 1;
    } else {
      id = 4;
    }
  }
  console.log(roles[id-1]);
  const role = new Role(roles[id-1]);
  document.querySelector('.longread__section__end__result').innerHTML = role.createHTMLForRole();
}


const handleScrollRoles = e => {
  const target = e.currentTarget;
  const $img = document.querySelectorAll('.longread__section__roles__imgs__card');
  $img.forEach((img, i) => {
    const distance = calcDistance(target, img);
    const height = img.offsetHeight;
    const $titles = document.querySelectorAll('.longread__section__roles__titles__title');
    if(distance >= 0 && distance < (height - 80)) {
      $titles[i].classList.add("longread__section__roles__titles__title--highlight");
    } else {
      $titles[i].classList.remove("longread__section__roles__titles__title--highlight");
    };
  });
}


const calcDistance = (target, el) => {
  const parentTop = target.getBoundingClientRect().top;
  const currentChildTop = el.getBoundingClientRect().top;
  var childParentDistance = Math.abs(parentTop - currentChildTop);
  const scrolledParentDistance = Math.abs(parentTop - target.getBoundingClientRect().top);
  return childParentDistance - scrolledParentDistance;
}


const handleScrollLaws = e => {
  const target = e.currentTarget;
  const $text = document.querySelectorAll('.longread__section__laws__text');
  $text.forEach((text, i) => {
    const parentLeft = target.getBoundingClientRect().left;
    const currentChildLeft = text.getBoundingClientRect().left;
    var childParentDistance = Math.abs(parentLeft - currentChildLeft);
    const scrolledParentDistance = Math.abs(parentLeft - target.getBoundingClientRect().left);
    const distance = childParentDistance - scrolledParentDistance;
    const $laws = target.querySelectorAll('.longread__section__laws__text__title');
    const $dots = document.querySelectorAll('.longread__section__laws__dots__dot');
    const width = text.offsetWidth;
    console.log(`${i} ${distance} ${width}`);
    if(distance >= 0 && distance < (width/3)) {
      $laws[i].classList.add("longread__section__laws__text__title--higlight");
      $dots[i].classList.add("longread__section__laws__dots__dot--highlight");
    } else {
      $laws[i].classList.remove("longread__section__laws__text__title--higlight");
      $dots[i].classList.remove("longread__section__laws__dots__dot--highlight");
    }
  });
}


const handleClickImgCloseFullscreen = e => {
  const $btn = e.currentTarget;
  const $img = $btn.parentElement;
  $btn.style.display = 'none';
  $img.querySelector('.longread__section__img-closefullscreen').style.display = 'none';
  $img.querySelector('.longread__section__img-fullscreen').style.display = 'block';
  $img.querySelectorAll('.longread__section__information').forEach(info => info.style.opacity = '0');
  $img.querySelector('.longread__section__information__swipe').style.display = 'none';
  $img.style.width = '100vw';
  $img.style.height = '56.25vw';
  $img.style.backgroundSize = '100vw auto';
  $img.parentElement.style.overflowX = 'hidden';
  $img.parentElement.style.overflowY = 'scroll';
}


const handleClickImgFullscreen = e => {
  const $btn = e.currentTarget;
  const $img = $btn.parentElement;
  $btn.style.display = 'none';
  $img.querySelector('.longread__section__img-closefullscreen').style.display = 'block';
  $img.querySelectorAll('.longread__section__information').forEach(info => info.style.opacity = '1');
  $img.querySelector('.longread__section__information__swipe').style.display = 'block';
  $img.style.height = '100vh';
  $img.style.width = '177.78vh';
  $img.style.backgroundSize = '177.78vh 100vh';
  $img.parentElement.style.overflowX = 'scroll';
  $img.parentElement.style.overflowY = 'hidden';
}


const handleScrollDefs = e => {
  const target = e.currentTarget;
  const $text = document.querySelectorAll('.longread__section__definitions__explain__text');
  $text.forEach((text, i) => {
    const distance = calcDistance(target, text);
    const height = text.offsetHeight;
    const $definition = document.querySelectorAll('.longread__section__definitions__terms__term');
    if(distance >= 0 && distance < (height - 60)) {
      $definition[i].classList.add("longread__section__definitions__terms__term--highlight");
    } else {
      $definition[i].classList.remove("longread__section__definitions__terms__term--highlight");
    };
  });
};


const handleClickCopy = e => {
  e.preventDefault();
  const btn = e.currentTarget;
  btn.style.animation = 'copy 1s';
  btn.innerHTML = `<svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M11.8749 1C12.0849 1 12.2862 1.08341 12.4347 1.23187C12.5832 1.38034 12.6666 1.5817 12.6666 1.79167C12.6666 2.00163 12.5832 2.20299 12.4347 2.35146C12.2862 2.49993 12.0849 2.58333 11.8749 2.58333H3.16659V12.875C3.16659 13.085 3.08318 13.2863 2.93471 13.4348C2.78625 13.5833 2.58488 13.6667 2.37492 13.6667C2.16496 13.6667 1.96359 13.5833 1.81513 13.4348C1.66666 13.2863 1.58325 13.085 1.58325 12.875V2.58333C1.58325 1.7125 2.29575 1 3.16659 1H11.8749Z" fill="#8EDDFF"/>
  <path fill-rule="evenodd" clip-rule="evenodd" d="M15.0417 4.16669H6.33333C5.91341 4.16669 5.51068 4.3335 5.21375 4.63043C4.91681 4.92737 4.75 5.33009 4.75 5.75002V16.8334C4.75 17.2533 4.91681 17.656 5.21375 17.9529C5.51068 18.2499 5.91341 18.4167 6.33333 18.4167H15.0417C15.4616 18.4167 15.8643 18.2499 16.1613 17.9529C16.4582 17.656 16.625 17.2533 16.625 16.8334V5.75002C16.625 5.33009 16.4582 4.92737 16.1613 4.63043C15.8643 4.3335 15.4616 4.16669 15.0417 4.16669ZM15.8742 7.69399C16.1424 7.2112 15.9685 6.6024 15.4857 6.33419C15.0029 6.06597 14.3941 6.23992 14.1259 6.7227L9.87481 14.3747L7.80006 11.6083C7.46869 11.1665 6.84189 11.077 6.40006 11.4083C5.95823 11.7397 5.86869 12.3665 6.20006 12.8083L9.20006 16.8083C9.40337 17.0794 9.73014 17.2291 10.0682 17.206C10.4063 17.1829 10.7097 16.9902 10.8742 16.694L15.8742 7.69399Z" fill="#8EDDFF"/>
  </svg> Gekopieerd`;
  btn.style.color = '#8EDDFF';
  console.log(e.currentTarget);
  const code = 'HHIENUDDAETOI';
  navigator.clipboard.writeText(code);
};


let counter = 0;
let letters = [];

const handleClickTile = e => {
  const tileId = e.currentTarget.dataset.tile;
  const $showTopNum = document.querySelector('.showTop span');
  document.querySelectorAll('.topbar__content__text').forEach($text => $text.style.display = 'none');
  document.querySelector('.topbar__content__img').style.display = 'none';
  document.querySelector('.topbar__content__scrabbletray-wrapper').style.display = 'block';

  document.querySelectorAll('.topbar__content__scrabbletray__tiles__tile').forEach($tile => {
    if($tile.id == tileId) {
      if(letters.includes(tileId) == false) {
        letters.push(tileId);
        $tile.style.opacity = '1';
        counter++;
      }
    }
  });
  $showTopNum.textContent = counter;
  if(letters.length === 13) {
    document.querySelector('.topbar__content__scrabbletray__copy').style.display = 'block';
  };
};


const handleClickFullScreen = e => {
  e.preventDefault();
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
  };
};


const handleClickExitFullScreen = e => {
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
	};
};


const interactiveImages = () => {
  document.querySelectorAll('.longread__section__information').forEach(button => {
    button.removeAttribute('title');
    button.addEventListener('mouseenter', handleHoverInfo);
    button.addEventListener('mouseleave', handleHoverLeaveInfo);
  });
}


const handleHoverInfo = e => {
  const target = e.currentTarget;
  const explain = target.nextElementSibling;
  explain.style.display = 'block';
  if(e.clientX > window.innerWidth/2) {
    explain.style.right = `${window.innerWidth - e.clientX}px`;
  } else {
    explain.style.left = `${e.clientX}px`;
  }
  if(window.innerWidth <= 500) {
    explain.style.top = `${e.clientY - 115}px`;
  } else {
    explain.style.top = `${e.clientY - 100}px`;
  }
}


const handleHoverLeaveInfo = e => {
  const target = e.currentTarget;
  const explain = target.nextElementSibling;
  explain.style.display = 'none';
}



init();
