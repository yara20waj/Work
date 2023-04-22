import 'package:flutter/material.dart';
import 'package:jewellery/widgets/app_drawer.dart';

class EditProduct extends StatelessWidget {
  static const routeName = '/Edit-Product';

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text("Edit Products"),
      ),
      body: Center(
        child: Text('Edit Product presented'),
      ),
      drawer: AppDrawer(),
    );
  }
}
