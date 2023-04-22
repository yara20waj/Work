import 'dart:async';

import 'package:flutter/material.dart';
import 'package:jewellery/signup.dart';
import '../EARRINGS/types.dart';
import '../BRACELETS/braceletsall.dart';
import '../RINGS/ringsall.dart';
import '../WATCHES/watchesall.dart';
import '../widgets/app_drawer.dart';

void main() {
  runApp(SplashScreen());
}

class SplashScreen extends StatefulWidget {
  static const routeName = '/SplashScreen';

  @override
  State<StatefulWidget> createState() => StartState();
}

class StartState extends State<SplashScreen> {
  route() {
    Navigator.pushReplacement(
        context, MaterialPageRoute(builder: (context) => SignUp()));
  }

  @override
  Widget build(BuildContext context) {
    return initWidget(context);
  }

  Widget initWidget(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Product Details'),
      ),
      body: GridView(
        padding: EdgeInsets.all(15),
        children: [
          ElevatedButton(
            onPressed: () {
              Navigator.push(
                context,
                MaterialPageRoute(builder: (context) => Earrings()),
              );
            },
            child: const Text('Earrings',
                style: const TextStyle(color: Colors.white)),
            style: ElevatedButton.styleFrom(
                primary: Colors.purple,
                padding:
                    const EdgeInsets.symmetric(horizontal: 20, vertical: 20),
                textStyle:
                    const TextStyle(fontSize: 20, fontWeight: FontWeight.bold)),
          ),
          ElevatedButton(
            onPressed: () {
              Navigator.push(
                context,
                MaterialPageRoute(builder: (context) => BRACELETS()),
              );
            },
            child:
                const Text('BRACELETS', style: const TextStyle(color: Colors.red)),
            style: ElevatedButton.styleFrom(
                primary: Colors.white,
                padding:
                    const EdgeInsets.symmetric(horizontal: 20, vertical: 20),
                textStyle:
                    const TextStyle(fontSize: 20, fontWeight: FontWeight.bold)),
          ),
          ElevatedButton(
            onPressed: () {
              Navigator.push(
                context,
                MaterialPageRoute(builder: (context) => Rings()),
              );
            },
            child: const Text('Rings',
                style: const TextStyle(color: Colors.black)),
            style: ElevatedButton.styleFrom(
                primary: Colors.greenAccent,
                padding:
                    const EdgeInsets.symmetric(horizontal: 20, vertical: 20),
                textStyle:
                    const TextStyle(fontSize: 20, fontWeight: FontWeight.bold)),
          ),
          ElevatedButton(
            onPressed: () {
              Navigator.push(
                context,
                MaterialPageRoute(builder: (context) => Watches()),
              );
            },
            child:
                const Text('Watches', style: const TextStyle(color: Colors.cyan)),
            style: ElevatedButton.styleFrom(
                primary: Colors.redAccent,
                padding:
                    const EdgeInsets.symmetric(horizontal: 20, vertical: 20),
                textStyle:
                    const TextStyle(fontSize: 20, fontWeight: FontWeight.bold)),
          ),
        ],
        gridDelegate: const SliverGridDelegateWithMaxCrossAxisExtent(
          maxCrossAxisExtent: 200,
          childAspectRatio: 4 / 3,
          crossAxisSpacing: 50,
          mainAxisSpacing: 50,
        ),
      ),
      drawer: AppDrawer(),
    );
  }
}
