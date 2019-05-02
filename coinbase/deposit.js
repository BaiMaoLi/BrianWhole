var coinbase   = require('coinbase');

const mykey    = process.argv[2];
const mysecret = process.argv[3];
const walletId = process.argv[4];

var client   = new coinbase.Client({'apiKey': mykey, 'apiSecret': mysecret});

var address = null;

client.getAccount(walletId, function(err, account) {
  account.createAddress(null,function(err, addr) {
  	console.log(addr);
  	if(addr)
  	{
    	console.log(JSON.parse(JSON.stringify(addr)).address);
  	}
  	else
  	{
  		console.log(err);
  	}
  });
});
