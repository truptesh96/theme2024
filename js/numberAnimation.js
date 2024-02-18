/*--- Number Animation ---*/
    
    function numberCounter(elem) {
        var number = elem.textContent.replace( /^\D+/g, '');
        var counter = 0;
        var time = 1200; // in ms
        var speed =  time/number < 500 ? time/number : 500;
        
        elem.textContent = counter;
        function myLoop() {          
          setTimeout(function() {   
            elem.textContent = counter;  
            counter++;
            if (counter <= number) {           
                myLoop(); 
            }
          }, speed) }

        myLoop(); 
        
    };
    
    ScrollOut({ targets: '.numCounter', 
    onShown(el){
        el.classList.add("in"); 
        numberCounter(el);
    },threshold:.8,
	once: true });

    /*--- Number Animation Ends ---*/