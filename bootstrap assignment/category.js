var food=["butterchicken.jpg","dhokla.jpg","golgappe.jpg","idli.jpg","momos.jpg"];
var electronics=["headphones.jpg","laptop.jpg","mobile.jpeg","pendrives.jpg","tablet.jpg"];
var sports=["football.jpg","tabletennis.jpg","basketball.png","cricket.jpg","badminton.jpg"];
var accessories=["earrings.jpg","sunglasses.jpg","necklace.jpg","bangles.jpg","rings.jpg"];
var clothes=["tshirts.jpg","jeans.jpg","sweater.jpg","jacket.jpg","shirts.jpg"];
var other=["default.jpg","default.jpg","default.jpg","default.jpg","default.jpg"];
var clonecount=0;
function displayitem(category){
	var itemimg=document.getElementsByClassName('itemimg');
	var productname=document.getElementsByClassName('productname');
	var arr=[];
	var btns=document.getElementsByClassName('cartbtn');
	//alert('here'); 	 	
	switch(category){
		case '0': arr=food.slice();
			
			break;
		case '1':  arr=electronics.slice();
			break;
		case '2':  arr=sports.slice();
			break;
		case '3':  arr=accessories.slice();
			break;
		case '4':  arr=clothes.slice();
			break;
		default: arr=other.slice();
	}
	$(".itemimg").popover({trigger:"hover focus"});	

	for(var i=0;i<arr.length;i++){
		//alert(arr[i]);
		itemimg[i].src=arr[i];
		itemimg[i].id=""+category+i;
		btns[i].id=""+category+i;
		btns[i].setAttribute('onclick','addtocart('+""+itemimg[i].id+')');
		itemimg[i].setAttribute('data-content','MRP : Rs. xxx \n Tax: Rs. yyy \n Total: Rs aaa');
		var name=arr[i].substr(0,arr[i].indexOf('.'));
		productname[i].innerHTML=name;
		
	}
	displayrow();
}
function displayrow(){
	document.getElementById('itemsrow').style.display="block";
}

function addcategory(){
	var clone=document.getElementById('clonenode').cloneNode(true);
	var row=document.getElementById('categoryrow');
	clone.id="clone"+clonecount;
	row.appendChild(clone);
	var child=clone.children[0].children;
	child[0].id="img"+clonecount;
	child[0].src="defaultcategory.jpg";
	document.getElementById("img"+clonecount).setAttribute('onclick','displayitem(-1)');
	clonecount++;
}
var cart=[];
function addtocart(index){
	if(index>=0&&index<=4){
		cart.push(food[index]);
	}
	else{
		var str=""+index;
		var spl=str.split('');
		switch(spl[0]){
			case '1': cart.push(electronics[spl[1]]);
					break;
			case '2': cart.push(sports[spl[1]]);
					break;
			case '3': cart.push(accessories[spl[1]]);
					break;
			case '4': cart.push(clothes[spl[1]]);
					break;
			default: cart.push(other[spl[1]]);
		}
	}
	
	var cartitems=document.getElementById('itemscart');
	var cartlen=document.getElementsByClassName('cartimg').length;
	for(i=cartlen;i<cart.length;i++){
		var img=document.createElement('img');
		img.src=cart[i];
		img.className="cartimg";
		img.style.height="100px";
		img.style.width="100px";
		cartitems.appendChild(img);
		var p=document.createElement('p');
		p.innerHTML="MRP xxx";
		cartitems.appendChild(p);
		var br=document.createElement('br');
		cartitems.appendChild(br);
	}
	
}
var cartcount=0;
function displaycart(){
	cartcount++;
	if(cartcount%2!=0)
		document.getElementById('cart').style.display="block";
	else
		document.getElementById('cart').style.display="none";
}