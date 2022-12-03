// nav shrink
window.onscroll = function () {
  scrollFunction()
}

function scrollFunction() {
  if (document.body.scrollTop > 40 || document.documentElement.scrollTop > 40) {
    document.getElementById("navbar").style.padding = "1rem 1rem";
    document.getElementById("navbar").style.backgroundColor = "rgb(6,32,44)"
    document.getElementById("navbar").style.boxShadow = "0 4px 30px rgba(0, 0, 0, 0.5)"
  } else {

    document.getElementById("navbar").style.padding = "1.5rem 1.5rem";
    document.getElementById("navbar").style.backgroundColor = "transparent"
    document.getElementById("navbar").style.backdropFilter = "none"
    document.getElementById("navbar").style.boxShadow = "none"

  }
}

var lastScrollTop;

navbar = document.getElementById('navbar');

window.addEventListener('scroll', function () {

  var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

  if (scrollTop > lastScrollTop) {
    navbar.style.top = '-500px';
  } else {
    navbar.style.top = '0';
  }

  lastScrollTop = scrollTop; //New Position Stored
});

// end nav shrink


// tinymce
tinymce.init({
  selector:'#editor1',
  menubar: false,
  statusbar: false,
  plugins: 'autoresize anchor autolink charmap code codesample directionality fullpage help hr image imagetools insertdatetime link lists media nonbreaking pagebreak preview print searchreplace table template textpattern toc visualblocks visualchars',
  toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help fullscreen ',
  skin: 'bootstrap',
  toolbar_drawer: 'floating',
  min_height: 200,           
  autoresize_bottom_margin: 16,
  setup: (editor) => {
      editor.on('init', () => {
          editor.getContainer().style.transition="border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out"
      });
      editor.on('focus', () => {
          editor.getContainer().style.boxShadow="0 0 0 .2rem rgba(0, 123, 255, .25)",
          editor.getContainer().style.borderColor="#80bdff"
      });
      editor.on('blur', () => {
          editor.getContainer().style.boxShadow="",
          editor.getContainer().style.borderColor=""
      });
  }
});
tinymce.init({
selector:'#editor2',
menubar: false,
statusbar: false,
plugins: 'autoresize anchor autolink charmap code codesample directionality fullpage help hr image imagetools insertdatetime link lists media nonbreaking pagebreak preview print searchreplace table template textpattern toc visualblocks visualchars',
toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help fullscreen ',
skin: 'bootstrap',
toolbar_drawer: 'floating',
min_height: 250,           
autoresize_bottom_margin: 16,
setup: (editor) => {
    editor.on('init', () => {
        editor.getContainer().style.transition="border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out"
    });
    editor.on('focus', () => {
        editor.getContainer().style.boxShadow="0 0 0 .2rem rgba(0, 123, 255, .25)",
        editor.getContainer().style.borderColor="#80bdff"
    });
    editor.on('blur', () => {
        editor.getContainer().style.boxShadow="",
        editor.getContainer().style.borderColor=""
    });
}
});
tinymce.init({
  selector:'#editor3',
  menubar: false,
  statusbar: false,
  plugins: 'autoresize anchor autolink charmap code codesample directionality fullpage help hr image imagetools insertdatetime link lists media nonbreaking pagebreak preview print searchreplace table template textpattern toc visualblocks visualchars',
  toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help fullscreen ',
  skin: 'bootstrap',
  toolbar_drawer: 'floating',
  min_height: 450,           
  autoresize_bottom_margin: 16,
  setup: (editor) => {
      editor.on('init', () => {
          editor.getContainer().style.transition="border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out"
      });
      editor.on('focus', () => {
          editor.getContainer().style.boxShadow="0 0 0 .2rem rgba(0, 123, 255, .25)",
          editor.getContainer().style.borderColor="#80bdff"
      });
      editor.on('blur', () => {
          editor.getContainer().style.boxShadow="",
          editor.getContainer().style.borderColor=""
      });
  }
});
// end tinymce