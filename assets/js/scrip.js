// 마우스 커서 
const cursor = document.querySelector('.cursor'); 

// 커서 이동
document.addEventListener('mousemove',(e) => { 
    cursor.style.top = `${e.clientY}px`
    cursor.style.left = `${e.clientX}px`
    cursor.animate({
        top : `${e.clientY}px`, left : `${e.clientX}px`
    },1000)

    // 마우스 좌표값 구하기
    document.querySelector('.deco-wrap .mouse .x').innerHTML = `${e.clientX}`
    document.querySelector('.deco-wrap .mouse .y').innerHTML = `${e.clientY}`
});

// 현재 시간

setInterval(() => {
    const date = new Date();
    const hours = ('0' + date.getHours()).slice(-2);
    const minutes = ('0' + date.getMinutes()).slice(-2);
    const seconds = ('0' + date.getSeconds()).slice(-2);
    const timeStr = hours + ':' + minutes + ':' + seconds;

    document.querySelector('.deco-wrap .time').innerHTML = timeStr
}, 1000);

// 마우스 클릭
document.addEventListener('mousedown',()=>{ 
    cursor.classList.add('clicked'); 
});
document.addEventListener('mouseup',()=>{ 
    cursor.classList.remove('clicked'); 
});
// 링크 hover
let links = document.querySelectorAll('a');
links.forEach(i=>{
    i.addEventListener('mouseover',()=>{ 
        cursor.classList.add('pointer'); 
    });
    i.addEventListener('mouseout',()=>{ 
        cursor.classList.remove('pointer'); 
    });
})
// 버튼 hover
let btns = document.querySelectorAll('button');
btns.forEach(i=>{
    i.addEventListener('mouseover',()=>{ 
        cursor.classList.add('pointer'); 
    });
    i.addEventListener('mouseout',()=>{ 
        cursor.classList.remove('pointer'); 
    });
})


// 메뉴 열고 닫기 
$('#gnbToggle').click(()=>{
    $('#gnbToggle').toggleClass('open');
    $('#gnbToggle').toggleClass('close');
    $('.header').toggleClass('open');
    $('.gnb-wrapper').toggleClass('open');
    $('body').toggleClass('dimmed');
})

// 메뉴 링크 클릭시 닫기 
$('.nav').click((e)=>{
    $('#gnbToggle').toggleClass('open');
    $('#gnbToggle').toggleClass('close');
    $('.header').toggleClass('open');
    $('.gnb-wrapper').toggleClass('open');
    $('body').toggleClass('dimmed');
})

// 인트로 애니메이션
const intro = gsap.timeline();
intro
    .addLabel('a')
    .from(".sc-intro .text:first-child",{autoAlpha:0, x:-180, duration:1.5,delay:1},'a')
    .from(".sc-intro .particle2",{rotate:360,autoAlpha:0,duration:0.2,delay:1.7},'a')
    .from(".sc-intro .main-text",{autoAlpha:0, x:-90,delay:1.25, duration:1.5},'a')
    .from(".sc-intro .text:nth-child(3)",{autoAlpha:0, x:-45,delay:1.5,duration:1.5},'a')
    .from(".sc-intro .particle3",{rotate:-180,autoAlpha:0,duration:0.2,delay:2.2},'a')
    .from(".sc-intro .mini-text",{autoAlpha:0, y:50, rotate:5, delay:2.5,duration:0.6},'a')
    .from(".sc-intro .img-box",{autoAlpha:0,yPercent:30,duration:0.4,delay:3.5},'a')
    
const intro2 = gsap.timeline();
intro2
    .addLabel('a')
    .to(".sc-intro .particle1",{autoAlpha:0, scale:1.8, yPercent:-30},'a')
    .fromTo(".sc-intro .particle2",{rotate:0,xPercent:0,yPercent:0},{rotate:-30,xPercent:15,yPercent:10,duration:1},'a')
    .fromTo(".sc-intro .particle3",{rotate:0},{rotate:10,duration:1},'a')
    .fromTo(".sc-intro .img-box",{rotate:0,yPercent:0},{rotate:2,yPercent:8,duration:1},'a')
    
ScrollTrigger.create({
    animation: intro2,
    trigger: ".sc-intro",
    start: "50% 40%",
    end: "bottom 40%",
    scrub: true,
    pin: false,
    markers: false
});



// ABOUT 롤링 
const marquee = gsap.timeline();
marquee
    .addLabel('a')
    .from(".sc-about .marquee1 .wrap",{xPercent:-90},'a')
    .to(".sc-about .marquee2 .wrap",{xPercent:-50},'a')
    .from(".sc-about .marquee3 .wrap",{xPercent:-70},'a')
ScrollTrigger.create({
    animation: marquee,
    trigger: ".sc-about",
    start: "top 80%",
    end: "150% 60%",
    scrub: true,
    pin: false,
    markers: false
});
// ABOUT PARTICLE
const aboutParticle = gsap.timeline();
aboutParticle
    .addLabel('a')
    .fromTo(".sc-about .particle",{rotate:-80, xPercent:100, yPercent:200},{rotate:20, xPercent:-10, yPercent:-10},'a')
ScrollTrigger.create({
    animation: aboutParticle,
    trigger: ".sc-about .particle-wrap",
    start: "top 80%",
    end: "top 15%",
    scrub: true,
    pin: false,
    markers: false
});
// WORK PARTICLE
const workParticle = gsap.timeline();
workParticle
    .addLabel('a')
    .from(".sc-work .particle",{xPercent:-30, yPercent:-40,rotate:15},'a')
ScrollTrigger.create({
    animation: workParticle,
    trigger: ".sc-work .particle-wrap",
    start: "top 100%",
    end: "top 35%",
    scrub: true,
    pin: false,
    markers: false
});

// 커서 이동시 이미지박스 함께 이동
document.addEventListener('mousemove',(e) => { 
    cursorImgBox.style.top = `${e.clientY}px`
    cursorImgBox.style.left = `${e.clientX}px`
    cursorImgBox.animate({
        top : `${e.clientY}px`, left : `${e.clientX}px`
    },2000)
});

// 프로젝트 호버시 마우스 이미지 변경
let cursorImgBox = document.querySelector('.cursor .img-box');
let workLinks = document.querySelectorAll('.work-item a:first-child');

workLinks.forEach(i=>{
    imageUrl = $(i).attr('data-img');
    let cursorImg = document.querySelector(`${imageUrl}`);

    i.addEventListener('mouseover',()=>{ 
        cursorImgBox.classList.add('on');
        cursorImg.classList.add('on');

        // cursorImg.style.backgroundImage = "url("+imageUrl+")"
    });
    i.addEventListener('mouseout',()=>{ 
        cursorImgBox.classList.remove('on');
        cursorImg.classList.remove('on');
    });
})


// 푸터 스크롤트리거
const footer = gsap.timeline();
footer
    .addLabel('a')
    .to(".deco-wrap .mouse",{autoAlpha:0, duration:1.2},'a')
    .from(".footer .particle1",{autoAlpha:0.6,rotate:5,xPercent:10,yPercent:-10,duration:10},'a')
    .to(".footer .particle2",{autoAlpha:0.8, xPercent:20,rotate:10,scale:1.05,duration:20},'a')
    .from(".footer .particle3",{rotate:-5,xPercent:-40,yPercent:100,duration:20},'a')
    
ScrollTrigger.create({
    animation: footer,
    trigger: ".footer",
    start: "0% 50%",
    end:"60% 50%",
    scrub: true,
    pin: false,
    markers: false
});