import 'package:carousel_slider/carousel_slider.dart';
import 'package:flutter/material.dart';

class CarouselWithDotsPage extends StatefulWidget {
  List<String> imglist = [
    "images/bracelets.jpg",
  ];

  CarouselWithDotsPage({required this.imglist});

  @override
  _CarouselWithDotsPageState createState() => _CarouselWithDotsPageState();
}

class _CarouselWithDotsPageState extends State<CarouselWithDotsPage> {
  int _current = 0;

  @override
  Widget build(BuildContext context) {
    final List<Widget> imageSliders = widget.imglist
        .map((item) => Container(
      child: ClipRRect(
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
                decoration: BoxDecoration(
                  gradient: LinearGradient(
                    colors: [
                      Color.fromARGB(200, 0, 0, 0),
                    ],
                    begin: Alignment.bottomCenter,
                    end: Alignment.topCenter,
                  ),
                ),
                padding: EdgeInsets.symmetric(
                  horizontal: 20,
                  vertical: 10,
                ),
              ),
            ),
          ],
        ),
      ),
    ))
        .toList();

    return Column(
      children: [
        TextButton(
            child: const Text(
              'Chanel Mini Square Flap Bag',
              style: TextStyle(
                //color: Colors.green[700],
                fontWeight: FontWeight.bold,
                fontSize: 18,
              ),
            ),
            onPressed: () {
              showModalBottomSheet(
                  context: context,
                  elevation: 5,
                  isScrollControlled: true,
                  builder: (_) => Container(
                      decoration: BoxDecoration(
                          boxShadow: [
                            BoxShadow(
                                color: Colors.black.withOpacity(0.25),
                                blurRadius: 30,
                                offset: Offset(2, 2))
                          ],
                          borderRadius: BorderRadius.circular(20.0),
                          border: Border.all(
                              color: Colors.white.withOpacity(0.2), width: 1.0),
                          gradient: LinearGradient(
                            begin: Alignment.topLeft,
                            end: Alignment.bottomRight,
                            colors: [
                              Colors.white.withOpacity(0.5),
                              Colors.white.withOpacity(0.1),
                            ],
                          )),
                      padding: EdgeInsets.only(
                        top: 15,
                        left: 15,
                        right: 15,
                        // this will prevent the soft keyboard from covering the text fields
                        bottom: MediaQuery.of(context).viewInsets.bottom + 20,
                      ),
                      child: Column(
                          mainAxisSize: MainAxisSize.min,
                          crossAxisAlignment: CrossAxisAlignment.end,
                          children: [
                            Flexible(
                                child: new Text(
                                  "Description:"
                                      "\nThis Mini Square flap bag is in yellow lambskin with light gold tone hardware and has a front flap with signature CC turnlock closure, rear half moon pocket and single interwoven yellow leather and light gold tone chain link shoulder/crossbody strap."
                                      "\n\nThe interior is lined in yellow leather and features a zipper pocket with Chanel pull and an open pocket below."
                                      "\n\nPrice: 6,500.00\$"
                                      "\n\nCollection: 2022 (RFID Chip)"
                                      "\n\nOrigin: Italy"
                                      "\n\nCondition: Pristine; new or never worn"
                                      "\n\nAccompanied by:  Chanel box, Chanel dustbag, carebook, ribbon, felt "
                                      "\n\nMeasurements: 6.5"
                                      " width x 5"
                                      " depth x 3"
                                      " height; 22"
                                      " strap drop",
                                ))
                          ])));
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
