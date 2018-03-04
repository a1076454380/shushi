		function mytap(url,data){
			var id=url.substring(0,url.indexOf('.'))
			mui.openWindow({
				url:url,
				id:id,
				extras:{
					mydata:data
				}
			})
		}
		mui.init()
		function mytapp(father,child,url,data){
			mui(father).on('tap',child,function(){
				var id=url.substring(0,url.indexOf('.'))
				mui.openWindow({
					url:url,
					id:id,
					extras:{
						mydata:data
					}
				})
			})
		}