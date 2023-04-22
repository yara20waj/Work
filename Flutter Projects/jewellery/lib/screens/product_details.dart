import 'package:flutter/material.dart';
import 'package:jewellery/widgets/app_drawer.dart';

class Product_Details extends StatelessWidget {
  static const routeName = '/Product-Details';

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Product Details'),
      ),
      body: Center(
        child: Text('Product Details presented'),
      ),
      drawer: AppDrawer(),
    );
  }
}
