<style type="text/css">
	.font-price {
		font-size: 12px!important; 
	}
	.add-to-fav-cont {
		padding: 0px!important;
		padding-left: 10px!important; 
	}
</style>  
@foreach($favorites as $block)
		<div class="col-lg-3 col-sm-3 col-xs-6">  
			<div class="col-lg-12">  
		 		@each('catalogo/product/view/item', array($block), 'product')  
		 	</div>
		</div> 
@endforeach 
