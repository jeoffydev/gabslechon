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

var app = new Vue({
  el: '#app',
  data: {
    message: 1,
    baseUrl : window.location.pathname
  },
  methods: {
    changeMessage: function () {
      this.message =  this.message + 1
    },
    addToCart: function(id, counter){
      var counter = counter || 1; 
      console.log(id, counter);
      
      var url = this.baseUrl + '/cart/cartapi/' + id + '/' + counter;
      $.get(url, function(response, status){
        console.log(response);
        console.log(status);
      });
    },
    //Get all cookies 
    getAllCookies : function(){
      var url = '/web/silverstripe/silv/products/getAllCookies';
      $.get(url, function(response, status){
        console.log(response);
        console.log(status);
      });
    }
  }
})
 