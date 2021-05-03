/*'use strict';

const e = React.createElement;

class LikeButton extends React.Component {
  constructor(props) {
    super(props);
    this.state = { liked: false };
  }

  render() {
    if (this.state.liked) {
      return 'You liked this.';
    }

    return e(
      'button',
      { onClick: () => this.setState({ liked: true }) },
      'Like'
    );
  }
}

let domContainer = document.querySelector('#like_button_container');
ReactDOM.render(<LikeButton />, domContainer); */



//this.$el.getAttribute('data-id');


Vue.directive('init', {
  bind: function(el, binding, vnode) {
    vnode.context[binding.arg] = binding.value;
  }
});

var app = new Vue({
  el: '#app',
  data: {
    message: '',
    allCounter: 1, 
    cartmodel: [],
    baseUrl : '/web/client/gabbys/gabbys-lechon/',
    cartSum: 0,
  },
  mounted() { 
    this.getCartSum();
    console.log(this.baseUrl)
  },
  methods: {
    changeMessage: function () {
      this.message =  this.message + 1
    },
    checkThisIDCart: function(id){
      console.log("This id ", id);
    },
    incrementCart: function(id) {
      const field =  $("input[name=counter"+id+"]").val();   
      console.log(field)
    },
    addToCart: function(id, counter){
      var counter = parseInt(counter) || 1; 
      //console.log(id, counter);
      
      var url = this.baseUrl + '/cart/cartapi/' + id + '/' + counter;
      $.get(url, function(response, status){
          //console.log(response);
         // console.log(status);  
        
          $('#alert' + id).css( 'display', 'block');  
          setTimeout(function(){  
              $('#alert' + id).css( 'display', 'none'); 
          }, 4000);
          

      }); 

     
    },
    getCartSum: function(){ 
       //Get the Cookies details 
        $("#cartTotal").append('');   
        var url2 = this.baseUrl + '/cart/getCookiesSum'; 
        $.get(url2, function(res){  
            $("#cartTotal").append(res);   
        });    
        
    },
     
    //Get all cookies 
    getAllCookies : function(){
      var url = this.baseUrl + '/cart/getCookiesHomepage';
      /*$.get(url, function(response, status){
        console.log(JSON.parse(response)); 
        if(response.length > 0){

          var json = JSON.parse(response);

          json.map( c => {
            //console.log(c);
            var cart = c.split(","); 
            var idNum = parseInt(cart[0]);
            var idValue = parseInt(cart[1]);

            //console.log( idNum  ); 
          })

          

          
        }
      });*/
    }
  }
})

 
 
