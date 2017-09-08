/*
██████╗  ██████╗ ███╗   ██╗███╗   ██╗███████╗███████╗███████╗
██╔══██╗██╔═══██╗████╗  ██║████╗  ██║██╔════╝██╔════╝██╔════╝
██║  ██║██║   ██║██╔██╗ ██║██╔██╗ ██║█████╗  █████╗  ███████╗
██║  ██║██║   ██║██║╚██╗██║██║╚██╗██║██╔══╝  ██╔══╝  ╚════██║
██████╔╝╚██████╔╝██║ ╚████║██║ ╚████║███████╗███████╗███████║
╚═════╝  ╚═════╝ ╚═╝  ╚═══╝╚═╝  ╚═══╝╚══════╝╚══════╝╚══════╝
*/
const carte = document.querySelector('#carte');
const panier = document.querySelector('aside');

const vignettes = carte.querySelectorAll('article');
	// création d'un tableau qui va contenir chaque composant de chaque vignette de manière ordonnée
const tabComponentVignettes = [];

	// on passe dans chaque case du tableau "vignettes"
vignettes.forEach((element, index) => {
		// On va insérer le contenu de chaque vignette dans une case différente
	tabComponentVignettes[index] = {
		productId: element.getAttribute('data-product-id'),
		productName: element.querySelector('h4').innerHTML,
		inputQuantity: element.querySelector('input[type="number"]'),
		productSalePrice: element.getAttribute('data-sale-price'),
		productPriceDisplay: element.querySelector('.prix'),
		inputSubmit: element.querySelector('input[type="submit"]')
	}
});

let produitsPanier = [];

if(sessionStorage.length > 0){
	produitsPanier = JSON.parse(sessionStorage.getItem('panierJson'));
}

const listePanier = panier.querySelector('ul');
const totalPanier = panier.querySelector('.total');
const valider = panier.querySelector('input[type="submit"]');


/*
███████╗ ██████╗ ███╗   ██╗ ██████╗████████╗██╗ ██████╗ ███╗   ██╗███████╗
██╔════╝██╔═══██╗████╗  ██║██╔════╝╚══██╔══╝██║██╔═══██╗████╗  ██║██╔════╝
█████╗  ██║   ██║██╔██╗ ██║██║        ██║   ██║██║   ██║██╔██╗ ██║███████╗
██╔══╝  ██║   ██║██║╚██╗██║██║        ██║   ██║██║   ██║██║╚██╗██║╚════██║
██║     ╚██████╔╝██║ ╚████║╚██████╗   ██║   ██║╚██████╔╝██║ ╚████║███████║
╚═╝      ╚═════╝ ╚═╝  ╚═══╝ ╚═════╝   ╚═╝   ╚═╝ ╚═════╝ ╚═╝  ╚═══╝╚══════╝
*/

function ajoutPanier(id, name, salePrice, maxQuantity, quantity){
	let newLigne = `<li data-product-id="${id}" data-sale-price="${salePrice}">
			<div class="produitPanier flex flexRow spaceBetween alignItemsCenter">
				<p>${name}</p>
				<div class="modify">
					<input type="number" min="0" max="${maxQuantity}" value="${quantity}">
					<input type="submit" name="delete" data-product-id="${id}" value="X">
				</div>
			</div>
		</li>`;
	listePanier.innerHTML += newLigne;
	majProduitPanier();
	ajoutEventListenerPanier(produitsPanier);
	refreshTotalPanier();
}

function removeFromPanier(element){
	listePanier.removeChild(element);
	majProduitPanier();
}

function majProduitPanier(){
	sessionStorage.clear();

	const temporaryTab = listePanier.querySelectorAll('li');
	produitsPanier = [...temporaryTab];

	let panierJson = [];

	produitsPanier.forEach((element, index) => {
		panierJson[index] = JSON.stringify(element.outerHTML);
		
	})
	sessionStorage.setItem('panierJson', JSON.stringify(panierJson));

}

function refreshTotalPanier(){
	const articles = listePanier.querySelectorAll('li');
	let prixTotal = 0;

	if(articles.length != 0){
		articles.forEach( function(element, index) {
			const mySalePrice = element.getAttribute('data-sale-price');
			const myQuantity = element.querySelector('input[type="number"]').value;
			element.querySelector('input[type="number"]').setAttribute('value', myQuantity);
			prixTotal += (myQuantity * mySalePrice);
		});
	}

	totalPanier.innerHTML = `${prixTotal} €`;
	majProduitPanier();
}

function ajoutEventListenerPanier(tabElement){
	console.log(tabElement);
	tabElement.forEach((element, index) =>{
		element.querySelector('input[type="number"]').onchange = refreshTotalPanier;
		element.querySelector('input[type="submit"]').onclick = function(){
			removeFromPanier(element);
			refreshTotalPanier();
		}
	})

}

/*
 ██████╗ ██████╗ ██████╗ ███████╗
██╔════╝██╔═══██╗██╔══██╗██╔════╝
██║     ██║   ██║██║  ██║█████╗  
██║     ██║   ██║██║  ██║██╔══╝  
╚██████╗╚██████╔╝██████╔╝███████╗
 ╚═════╝ ╚═════╝ ╚═════╝ ╚══════╝
*/
refreshTotalPanier();

tabComponentVignettes.forEach((element, index) => {
	element.inputSubmit.onclick = function(){
		let myProductId = element.productId;
		let myProductName = element.productName;
		let myProductSalePrice = element.productSalePrice;
		let myProductMaxQuantity = element.inputQuantity.getAttribute('max');
		let myProductQuantity = element.inputQuantity.value;

		if(myProductQuantity > 0){
			ajoutPanier(myProductId, myProductName, myProductSalePrice, myProductMaxQuantity, myProductQuantity);
		}
	};

	element.inputQuantity.onchange = function(){
		let salePrice = element.productSalePrice;
		let quantity = element.inputQuantity.value;
		let price = quantity * salePrice;

		if(price > 0){
			element.productPriceDisplay.innerHTML = `${price} €`;			
		}
		else{
			element.productPriceDisplay.innerHTML = ``;			
		}
	}
});