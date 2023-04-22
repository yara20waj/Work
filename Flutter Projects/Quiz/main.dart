import 'package:flutter/material.dart';
import 'quizquestions.dart';
import './result.dart';

void main() => runApp(MyApp());

class MyApp extends StatefulWidget {
  bool _switchVal = true;

  @override
  State<StatefulWidget> createState() {
    return _MyAppState();
  }
}

class _MyAppState extends State<MyApp> {
  var isOn = false;
  final List<Map<String, Object>> _questions = [
    {
      'questionText': 'what\'s your grading mark in mobile computing course?',
      'answers': [
        {'text': 'Excellent', 'score': 10},
        {'text': 'Very good', 'score': 8},
        {'text': 'Good', 'score': 7},
        {'text': 'Satisfied', 'score': 6},
      ],
    },
    {
      'questionText': 'what\'s your grading mark in Data Science course?',
      'answers': [
        {'text': 'Excellent', 'score': 10},
        {'text': 'Very good', 'score': 8},
        {'text': 'Good', 'score': 7},
        {'text': 'Satisfied', 'score': 6},
      ],
    },
    {
      'questionText': ' what\'s your grading mark in Image processing course?',
      'answers': [
        {'text': 'Excellent', 'score': 10},
        {'text': 'Very good', 'score': 8},
        {'text': 'Good', 'score': 7},
        {'text': 'Satisfied', 'score': 6},
      ],
    },
    {
      'questionText': 'what\'s your grading mark in Data structure course?',
      'answers': [
        {'text': 'Excellent', 'score': 10},
        {'text': 'Very good', 'score': 8},
        {'text': 'Good', 'score': 7},
        {'text': 'Satisfied', 'score': 6},
      ],
    },
  ];

  var _question = 0;
  var _totalSc = 0;

  void _resetQuiz() {
    setState(() {
      _question = 0;
      _totalSc = 0;
    });
  }

  void _answerQuestion(int score) {
    _totalSc += score;

    setState(() {
      _question = _question + 1;
    });
    print(_question);
    if (_question < _questions.length) {
      print('We have more questions!');
    } else {
      print('No more questions!');
    }
  }

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(
          actions: <Widget>[
            Switch(
              value: isOn,
              onChanged: (bool? val) {
                if (val != null)
                  setState(() {
                    isOn = val;
                  });
              },
            ),
          ],
          centerTitle: true,
          title: Text(
            ' Quiz App',
            style: TextStyle(color: Colors.black, fontSize: 24),
          ),
          backgroundColor: Color.fromARGB(255, 230, 84, 0),
        ),
        body: Padding(
          padding: const EdgeInsets.all(30.0),
          child: _question < _questions.length
              ? Quiz(
                  answerQuestion: _answerQuestion,
                  questionIndex: _question,
                  questions: _questions,
                ) //Quiz
              : Result(_totalSc, _resetQuiz),
        ),

        backgroundColor: Colors.black, //Padding
      ), //Scaffold
      debugShowCheckedModeBanner: false,
    ); //MaterialApp
  }
}
