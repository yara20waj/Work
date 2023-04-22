import 'package:flutter/material.dart';
import 'package:jewellery/widgets/app_drawer.dart';

class UserProduct extends StatelessWidget {
  static const routeName = '/User-Product';

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text('User')),
      body: Center(child: Text('User Products')),
      drawer: AppDrawer(),
    );
  }
}
