function lang(lang){
    langs = [];
    langs['fr']='Clavier Arabe';
    langs['en']='Arabic Keyboard';
    langs['ar']='لوحة مفاتيح عربية';
    
    $('.keyboardInputInitiator').on("click", function(){
        $('#keyboardInputlogo').text("Clavier Arabe");
    });
}