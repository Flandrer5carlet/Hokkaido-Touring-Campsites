const change_imag=(e)=> {
  switch(e.target.id){
    case 'btn1':
      var link="https://github.com/desandro/imagesloaded/blob/master/test/img/bowser-jr.jpg?raw=true";
      break;
    case 'btn2':
      var link='https://th.bing.com/th/id/OIP.iPS5l3aLWnFM8KPN3UBXNwHaFj?w=246&h=184&c=7&r=0&o=5&pid=1.7';
      break;
    case 'btn3':
      var link='https://th.bing.com/th/id/OIP.kRqTTBMzBoIlgw33Rbv9iQHaE8?w=277&h=184&c=7&r=0&o=5&pid=1.7';
      break;
    case 'btn4':
      var link='https://th.bing.com/th/id/OIP.iXjCF0vO7IjFXfmFTKyrkwHaFj?w=238&h=180&c=7&r=0&o=5&pid=1.7';
      break;
    case 'btn5':
      var link='https://th.bing.com/th/id/OIP.USYOU2TjrByBoOfjkRHZIAHaFj?w=207&h=180&c=7&r=0&o=5&pid=1.7';
      break;
    case 'btn6':
      var link='https://th.bing.com/th/id/OIP.nTnChsvS9nP8HAah4aJhsAHaFj?w=233&h=180&c=7&r=0&o=5&pid=1.7';
      break;
    case 'btn7':
      var link='https://th.bing.com/th/id/OIP.qq565_JGtv6f0Zea-DuDugHaE8?w=237&h=180&c=7&r=0&o=5&pid=1.7';
      break;
    case 'btn8':
      var link='https://tse1.mm.bing.net/th/id/OIP.Wvf7BtKnpmL_plDko0foEQHaDy?w=342&h=178&c=7&r=0&o=5&pid=1.7';
      break;
  }
  document.getElementById("pics").src=link;
}

//button要素を取得
const btn = document.getElementsByClassName("btn");
// イベントハンドラを実装　ボタンの数だけループ
let j=0;
while(j<btn.length){
    btn[j].addEventListener("click",change_imag);
    j++;
}