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
    counterNumber: [],
    totalCartValue: 0
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
      
      fetch(url)
        .then(response => { 
          console.log(response);
           //Refresh the counter 
          this.getCartSum();
        })
        .catch(error => {
          this.errorMessage = error;
          console.error("There was an error adding to cart!", error);
      }); 
     
    }, 
    addToCartSum: function (e) { 
      e.preventDefault();  

      if(e.target[0].value && e.target[1].value){
        this.addToCart(e.target[0].value, e.target[1].value); 
      } 
    },
    getCartSum: function(){ 
       //Get the Cookies details 
       
        var url2 = this.baseUrl + '/cart/getCookiesSum';  
        fetch(url2)
        .then(async response => {
          const data = await response.json();  
          this.totalCartValue = data;
          
        })
        .catch(error => {
          this.errorMessage = error;
          console.error("There was an error!", error);
        });

      
        
    },
     
    //Get all cookies 
    getAllCookies : function(){
      var url = this.baseUrl + '/cart/getCookiesHomepage';
      
    }
  }
})

 
 
