import 'package:flutter/material.dart';
import 'package:jewellery/widgets/app_drawer.dart';

class OrderProduct extends StatelessWidget {
  static const routeName = '/Order-Product';

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text("Order Products"),
      ),
      body: Center(
        child: Text('Order Product presented'),
      ),
      drawer: AppDrawer(),
    );
  }
}
