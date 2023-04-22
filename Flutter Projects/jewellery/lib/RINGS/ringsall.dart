import 'package:flutter/material.dart';
import 'package:jewellery/RINGS/ringCrystal.dart';
import 'package:jewellery/RINGS/dimondring.dart';

class Rings extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    final List<String> imageList = [
      "images/ring1.jpg",
      "images/ring2.jpg",
      "images/ring3.jpg",

    ];
    List<String> imglist = [
      "images/dimond1.jpg",
      "images/dimond2.jpg",
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
