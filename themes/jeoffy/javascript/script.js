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
    message: 1
  },
  methods: {
    changeMessage: function () {
      this.message =  this.message + 1
    },
    addToCart: function(id){
      console.log(id);
      var url = '/web/silverstripe/silv/products/testapi/' + id;
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

console.log("Yes script");
$("#testapi").click(function(){
  var id = $(this).data("id")
  var url = '/web/silverstripe/silv/home/testapi/' + id;
  $.get(url, function(response, status){
    console.log(response);
    console.log(status);
  });
});

 