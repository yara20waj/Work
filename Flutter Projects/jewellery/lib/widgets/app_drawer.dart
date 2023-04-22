import 'package:flutter/material.dart';
import 'package:flutter/widgets.dart';
import 'package:jewellery/signup.dart';
import '../screens/card_screen.dart';
import '../screens/editProduct_screen.dart';
import '../screens/order_screen.dart';
import '../screens/product_details.dart';
import '../screens/product_overview.dart';
import '../screens/user_screen.dart';
import '../signup.dart';

class AppDrawer extends StatelessWidget {
  const AppDrawer({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Drawer(
      child: Column(
        children: [
          AppBar(title: Text('Menu'), automaticallyImplyLeading: false),
          Divider(),
          ListTile(
            leading: Icon(Icons.shop),
            title: Text('Shop'),
            onTap: () => Navigator.of(context)
                .pushReplacementNamed(Product_Details.routeName),
          ),
          Divider(),
          ListTile(
            leading: Icon(Icons.payment),
            title: Text('Orders'),
            onTap: () => Navigator.of(context)
                .pushReplacementNamed(OrderProduct.routeName),
          ),
          Divider(),
          ListTile(
            leading: Icon(Icons.edit),
            title: Text('Manage Product'),
            onTap: () => Navigator.of(context)
                .pushReplacementNamed(UserProduct.routeName),
          ),
          Divider(),
          ListTile(
            leading: Icon(Icons.exit_to_app),
            title: Text('logout'),
            onTap: () {
              Navigator.of(context).pop();
              Navigator.of(context).pushReplacementNamed(SignUp.routeName);
              // logout
              //  Provider.of<Auth>(context, listen: false).logout();
            },
          ),
        ],
      ),
    );
  }
}
