import 'package:flutter/material.dart';
import 'package:jewellery/widgets/app_drawer.dart';

class CardProduct extends StatelessWidget {
  static const routeName = '/Card-roduct';

  @override
  Widget build(BuildContext context) {
    // each screen consist own title and body
    return Scaffold(
      appBar: AppBar(
        title: Text("Card Products"),
      ),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: <Widget>[
            Text('Card Screen'),
          ],
        ),
      ),
      drawer: AppDrawer(),
    );
  }
}
