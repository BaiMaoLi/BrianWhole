var coinbase   = require('coinbase');

const mykey     = process.argv[2];
const mysecret  = process.argv[3];
const walletId  = process.argv[4];
const toaddress = process.argv[5];
const amount    = process.argv[6];
const currency  = process.argv[7];

var client   = new coinbase.Client({'apiKey': mykey, 'apiSecret': mysecret});
 
// client.getAccounts({}, function(err, accounts) {
//   accounts.forEach(function(acct) {
//   	console.log(JSON.stringify(acct));
//     console.log('my bal: ' + acct.balance.amount + ' for ' + acct.name);
//   });
// });


// var address = null;

client.getAccount(walletId, function(err, account) {

//withdraw section
var args = {
  "to": toaddress,
  "amount": amount,
  "currency": currency,
  "description": "Sample transaction for you"
};
account.sendMoney(args, function(err, txn) {
  if(err)
  {
	  console.log("Insufficient balance");
  }
  if(txn)
  {
      console.log(txn.id);
  }
});


	/*console.log(JSON.stringify(err));
	console.log(JSON.stringify(account));
    console.log('my bal: ' + account.balance.amount + ' for ' + account.name);*/
	// console.log(err);
	// console.log(account);
  // account.createAddress(null,function(err, addr) {
  // 	console.log(err);
  //   console.log(JSON.parse(JSON.stringify(addr)).address);
  // });

	/*account.getTransactions(null, function(err, txns) {
			console.log(JSON.stringify(txns));
		// txns.forEach(function(txn) {
		// 	// console.log('my txn status: ' + txn.status);
		// });
	});*/

});
