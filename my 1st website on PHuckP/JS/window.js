(function()
{
	document.addEventListener('DOMContentLoaded',function()
	{
		var but = document.querySelectorAll('.btn')
		{
			for(var i = 0; i < but.length; i++)
			{
				but[i].onclick = function(event)
				{
					if(!confirm("Удалить"))
					{
						event.preventDefault();
					}
				}
			}
		}
	});
})();