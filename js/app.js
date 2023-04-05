const texts = document.querySelectorAll(".text");
const txtLoad = (target)=>{
  const txtio = new IntersectionObserver((entries,observer)=>{
      entries.forEach(entry=>{
          if(entry.isIntersecting){
              const txt=entry.target;
              txt.setAttribute("id", "ux_text");
              
          }
          else{
              const txt=entry.target;
              txt.setAttribute("id", "ui_text");
              
          }
      })
  },{threshold:[0.7]});

  txtio.observe(target);
}
texts.forEach(txtLoad);


const pics = document.querySelectorAll(".slider_image, .showcase_image");
const picLoad = (target)=>{
  const picio = new IntersectionObserver((entries,observer)=>{
      entries.forEach(entry=>{
          if(entry.isIntersecting){
              const pic=entry.target;
              pic.setAttribute("id", "ux_slider_image");
              
          }
          else{
              const pic=entry.target;
              pic.setAttribute("id", "ui_slider_image");
          }
      })
  },{threshold:[0.7]});

  picio.observe(target);
}
pics.forEach(picLoad);


const btns = document.querySelectorAll(".text_btn, .text_btn2");
const btnLoad = (target)=>{
  const btnio = new IntersectionObserver((entries,observer)=>{
      entries.forEach(entry=>{
          if(entry.isIntersecting){
              const btn=entry.target;
              btn.setAttribute("id", "ux_btn");
              
          }
          else{
              const btn=entry.target;
              btn.setAttribute("id", "ui_btn");
          }
      })
  },{threshold:[0.7]});

  btnio.observe(target);
}
btns.forEach(btnLoad);
