import 'package:flutter/material.dart';
import 'package:jewellery/screens/card_screen.dart';
import 'package:jewellery/screens/editProduct_screen.dart';
import 'package:jewellery/screens/order_screen.dart';
import 'package:jewellery/screens/product_details.dart';
import 'package:jewellery/screens/product_overview.dart';
import 'package:jewellery/screens/user_screen.dart';
import 'package:jewellery/screens/category.dart';
import 'package:jewellery/signup.dart';

void main() => runApp(Index());

class Index extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      // by default, theme consist color app and font
      theme: ThemeData(
        primarySwatch: Colors.blue,
        cardColor: Colors.deepOrange,
        fontFamily: 'Lato',
      ),
      home: SplashScreen(),
      routes: {
        SplashScreen.routeName: (_) => SplashScreen(),
        Product_Details.routeName: (_) => Product_Details(),
        CardProduct.routeName: (_) => CardProduct(),
        UserProduct.routeName: (_) => UserProduct(),
        OrderProduct.routeName: (_) => OrderProduct(),
        EditProduct.routeName: (_) => EditProduct(),
        SignUp.routeName: (_) => SignUp(),
      },
    );
  }
}
