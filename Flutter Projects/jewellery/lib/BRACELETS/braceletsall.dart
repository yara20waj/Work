import 'package:flutter/material.dart';
import 'package:jewellery/BRACELETS/braceletssilver.dart';
import 'package:jewellery/BRACELETS/goldenbracelts.dart';

class BRACELETS extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    final List<String> imageList = [
      "images/golden3.jpg",
      "images/golden2.jpg",
      "images/golden1.jpg",
    ];
    List<String> imglist = [
      "images/bracelets.jpg",
    ];
    return Scaffold(
      appBar: AppBar(
        title: const Text('Chanel'),
      ),
      body: Column(
        children: [
          ChanelLoveHeartBag(ChanelnLoveHeartBag: imageList),
          CarouselWithDotsPage(imglist: imglist),
        ],
      ),
    );
  }
}
