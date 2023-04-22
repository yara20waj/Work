import 'package:carousel_slider/carousel_slider.dart';
import 'package:flutter/material.dart';
import 'package:flutter/rendering.dart';

class ChanelLoveHeartBag extends StatefulWidget {
  List<String> ChanelnLoveHeartBag = [
    "images/golden3.jpg",
    "images/golden2.jpg",
    "images/golden1.jpg",
  ];

  ChanelLoveHeartBag({required this.ChanelnLoveHeartBag});

  @override
  _ChanelLoveHeartBagState createState() => _ChanelLoveHeartBagState();
}

class _ChanelLoveHeartBagState extends State<ChanelLoveHeartBag> {
  int _current = 0;

  @override
  Widget build(BuildContext context) {
    final List<Widget> imageSliders =
    widget.ChanelnLoveHeartBag.map((item) => ClipRRect(
      borderRadius: BorderRadius.all(
        Radius.circular(5.0),
      ),
      child: Stack(
        children: [
          Image.network(
            item,
            fit: BoxFit.cover,
          ),
          Positioned(
            bottom: 0.0,
            left: 0.0,
            right: 0.0,
            child: Container(
              //color: Color.fromARGB(100, 22, 44, 33),
              decoration: BoxDecoration(
                gradient: LinearGradient(
                  colors: [
                    Color.fromARGB(200, 0, 0, 0),
                    Color.fromARGB(0, 0, 0, 0),
                  ],
                  begin: Alignment.bottomCenter,
                  end: Alignment.topCenter,
                ),
              ),
            ),
          ),
        ],
      ),
    )).toList();

    return Column(
      children: [
        TextButton(
            child: const Text(
              'Chanel CC In Love Heart Belt Bag',
              style: TextStyle(
                fontWeight: FontWeight.bold,
                fontSize: 18,
              ),
            ),
            onPressed: () {
              showModalBottomSheet(
                  context: context,
                  elevation: 4,
                  isScrollControlled: true,
                  builder: (_) => Container(
                      color: Colors.white.withOpacity(0.2),
                      padding: EdgeInsets.only(
                        top: 15,
                        left: 15,
                        right: 15,
                        bottom: MediaQuery.of(context).viewInsets.bottom + 20,
                      ),
                      child: Column(
                        mainAxisSize: MainAxisSize.min,
                        crossAxisAlignment: CrossAxisAlignment.end,
                        children: [
                          Flexible(
                              child: new Text(
                                "Description:"
                                    "\nThis CC In Love Heart Belt Bag is in pink lambskin leather with light gold tone hardware and features a front flap with signature CC turnlock closure and an interwoven light gold tone chain link and pink leather adjustable belt strap "
                                    "\n\nThe interior is lined in pink fabric."
                                    "\n\nPrice: 6,500.00\$"
                                    "\n\nCollection: 32-series"
                                    "\n\nOrigin: France"
                                    "\n\nCondition: Pristine, new or never worn (plastic on hardware)"
                                    "\n\nAccompanied by: Chanel box, Chanel dustbag, carebook and COA card"
                                    "\n\nMeasurements: 4.5"
                                    " width x 4"
                                    " height x 1.5"
                                    " depth; 20"
                                    " adjustable strap",
                              ))
                        ],
                      )));
            }),
        CarouselSlider(
          items: imageSliders,
          options: CarouselOptions(
              autoPlay: true,
              enlargeCenterPage: true,
              aspectRatio: 2.0,
              onPageChanged: (index, reason) {
                setState(() {
                  _current = index;
                });
              }),
        ),
      ],
    );
  }
}
