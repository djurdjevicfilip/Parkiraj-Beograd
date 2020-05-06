window.onload = function() {
    document.getElementById('1').style.color='#81bdfc';
    
    document.getElementById('1').onclick = function() {
        const elements = document.querySelectorAll('a');
  
            elements.forEach( el => {
             el.style.color='white';
            });
        this.style.color = '#81bdfc';
        
    }
    document.getElementById('2').onclick = function() {
        const elements = document.querySelectorAll('a');
  
        elements.forEach( el => {
        el.style.color='white';
        });
        this.style.color = '#81bdfc';
  
        }
    
    document.getElementById('3').onclick = function() {
        const elements = document.querySelectorAll('a');
  
        elements.forEach( el => {
        el.style.color='white';
        });
        this.style.color = '#81bdfc';
  
        }
    
    document.getElementById('4').onclick = function() {
        const elements = document.querySelectorAll('a');
  
        elements.forEach( el => {
        el.style.color='white';
        });
        this.style.color = '#81bdfc';
  
        }
    }
    
    function f(){
        document.getElementById("mapa").src = "https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d11321.267444927093!2d20.456918188660833!3d44.81510906557635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1s0x475a65499711997b%3A0x40464ac7b2ccc061!2sKalemegdan%2C%20Belgrade!3m2!1d44.823182599999996!2d20.4504791!4m5!1s0x475a7a9f5ee145d3%3A0x3ed89b5bb505d83!2sUniversity%20of%20Belgrade%20School%20of%20Electrical%20Engineering%2C%20Bulevar%20kralja%20Aleksandra%2073%2C%20Beograd!3m2!1d44.8055056!2d20.4761359!5e0!3m2!1sen!2srs!4v1583617017490!5m2!1sen!2srs";
      
      }
      function f1(){
		document.getElementById("mapa").src = "https://www.google.com/maps/embed/v1/place?q=place_id:ChIJe5kRl0llWkcRYcDMssdKRkA&key=AIzaSyBI1Z5JWgKQYV3BPteFUT6CUoTcB7beBMU&zoom=12";
	  }
	   function f2(){
		document.getElementById("mapa").src = "https://www.google.com/maps/embed/v1/place?q=place_id:ChIJe5kRl0llWkcRYcDMssdKRkA&key=AIzaSyBI1Z5JWgKQYV3BPteFUT6CUoTcB7beBMU";
	  }