var coinbase   = require('coinbase');

const mykey     = process.argv[2];
const mysecret  = process.argv[3];
const type  = process.argv[4];
const pair  = process.argv[5];

var client   = new coinbase.Client({'apiKey': mykey, 'apiSecret': mysecret});
 
if(type=='sell')
{
	client.getSellPrice({'currencyPair': pair}, function(err, sellPrice) {
		if(err)
		{
			console.log(err);
		}
		else
		{
			console.log(JSON.stringify(sellPrice));
		}
	});
}
else
{
	client.getBuyPrice({'currencyPair': pair}, function(err, buyPrice) {
		if(err)
		{
			console.log(err);
		}
		else
		{
			console.log(JSON.stringify(buyPrice));
		}
	}); 
}

