;(function($){
	$.fn.extend({
		spinner:function(opt){
			opt=$.extend({
				filename:false,
				src:false,
				css:{position:'absolute',left:0,top:0,right:0,bottom:0,zIndex:1000,backgroundPosition:'50% 50%',backgroundRepeat:'no-repeat'},
				spinnerClassName:'spinner',
				faderClassName:'fader',
				minSleep:400,
				faderOpacity:.6,
				showFu:function(opt){
					$(this).parent()
						.append($('<span class="'+opt.faderClassName+'"></span>').css(opt.css).css({backgroundColor:'#000',opacity:0}).animate({opacity:opt.faderOpacity})
							.append($('<span class="'+opt.spinnerClassName+'"></span>').css(opt.css).css({backgroundImage:'url('+opt.filename+')'}))
						)
				},
				hideFu:function(opt){
					$(this).parent().find('.'+opt.faderClassName).fadeOut(function(){$(this).remove()})
				}
			},opt)
			var img=$(this),
				holder=img.parent(),
				outOfSpace=$('<img>')//.css({position:'absolute',left:-9999}).appendTo('body')
			if(!opt.filename)
				return this
			if(holder.css('position')!='absolute')
				holder.css({position:'relative'})
			
			
			holder.find('.'+opt.faderClassName).remove()
			opt.showFu.call(img,opt)
			
			outOfSpace.bind('load',function(){
				setTimeout(function(){					
					img.load(function(){
						opt.hideFu.call(img,opt)
					})
					//if(img.attr('src')!=outOfSpace.attr('src'))
						img.attr({src:opt.src})
					//else
						//opt.hideFu.call(img,opt)
				},opt.minSleep)
			})
			
			if(opt.src)
				outOfSpace.attr({src:opt.src})
			return img	
		}
	})
})(jQuery)