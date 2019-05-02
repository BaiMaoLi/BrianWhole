var coinbase   = require('coinbase');

const mykey     = process.argv[2];
const mysecret  = process.argv[3];
const type  = process.argv[4];
const currency = process.argv[5];
const amount    = process.argv[6];

var client   = new coinbase.Client({'apiKey': mykey, 'apiSecret': mysecret});

client.getAccount('primary', function(err, account) {
if(type=='sell')
{
      account.sell({'amount': amount,'currency': currency}, function(err, sell) {
          if(err)
          {
            console.log(err);
            console.log('Insuffient balance');
          }
          else
          {
            console.log(JSON.stringify(sell));
          }
      });
}
else
{
      account.buy({'amount': amount,'currency': currency}, function(err, buy) {
        	if(err)
          {
            console.log(err);
            console.log('Insuffient balance');
          }
          else
          {
            console.log(JSON.stringify(buy));
          }
      });
}
});

