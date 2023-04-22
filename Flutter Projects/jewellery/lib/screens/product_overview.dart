import 'package:flutter/material.dart';
import 'package:jewellery/widgets/app_drawer.dart';

class Product_Overview extends StatefulWidget {
  @override
  _Product_Overview createState() => _Product_Overview();
}

class _Product_Overview extends State<Product_Overview> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Product Overview'),
      ),
      body: Center(
          child: Text(
              'Product Overview Presented new Items in relavent products')),
      drawer: AppDrawer(),
    );
  }
}
