using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Alexa.NET.Request;
using Alexa.NET.Request.Type;
using Alexa.NET.Response;
using Amazon.Lambda.Core;

// Assembly attribute to enable the Lambda function's JSON input to be converted into a .NET class.
[assembly: LambdaSerializer(typeof(Amazon.Lambda.Serialization.Json.JsonSerializer))]

namespace KundenbestellportalSkill
{
    public class Function
    {
        private List<Bestellung> listeBestellungen;
        private const string InvocationName =
            "würth kundenbestellportal";

        private const string BestellungReadIntent =
            "BestellungReadIntent";
        private const string StopIntent =
            "AMAZON.StopIntent";
        private const string CancelIntent =
            "AMAZON.CancelIntent";
        private const string HelpIntent =
            "AMAZON.HelpIntent";

        public Function()
        {
            listeBestellungen = new List<Bestellung>
            {
                new Bestellung("Mutter4KT", 2000, 2.95),
                new Bestellung("Schraube4KT", 1500, 20.33),
                new Bestellung("Scheibe", 3000, 12.63)
            };
        }
        /// <summary>
        /// A simple function that takes a string and does a ToUpper
        /// </summary>
        /// <param name="input"></param>
        /// <param name="context"></param>
        /// <returns></returns>
        public SkillResponse FunctionHandler(SkillRequest input, ILambdaContext context)
        {
            var requestType = input.GetRequestType();

            if (requestType == typeof(LaunchRequest))
            {
                return HelpMessage();
            }
            else if (requestType == typeof(IntentRequest))
            {
                var intentRequest = input.Request as IntentRequest;
                switch (intentRequest.Intent.Name)
                {
                    case BestellungReadIntent:
                        return HandleBestellungenIntent();
                    case CancelIntent:
                    case StopIntent:
                        return StopMessage();
                    case HelpIntent:
                        return HelpMessage();
                    default:
                        return HelpMessage();
                }
            }
            else
            {
                return MakeSkillResponse($"Leider ging hier etwas schief.", true);
            }
        }

        private SkillResponse MakeSkillResponse(string outputSpeech,
            bool shouldEndSession, string repromtText = "")
        {
            var response = new ResponseBody
            {
                ShouldEndSession = shouldEndSession,
                OutputSpeech = new PlainTextOutputSpeech
                {
                    Text = outputSpeech
                }
            };

            if (repromtText != null)
            {
                response.Reprompt = new Reprompt
                {
                    OutputSpeech = new PlainTextOutputSpeech
                    {
                        Text = repromtText
                    }
                };
            }

            var skillResponse = new SkillResponse
            {
                Response = response,
                Version = "1.0"
            };

            return skillResponse;
        }

        private SkillResponse HelpMessage()
        {
            return MakeSkillResponse($"Hier ist das {InvocationName}. " +
                                     "Frag mich nach deinen Bestellungen bei Würth. " +
                                     "z.B. durch Fragen wie: Kannst du me   ine Bestellungen lesen?", false);
        }

        private SkillResponse StopMessage()
        {
            return MakeSkillResponse($"Vielen Dank für die Verwendung von " +
                                     $"{InvocationName}.", true);
        }

        private SkillResponse HandleBestellungenIntent()
        {
            string ergebnis = listeBestellungen.Aggregate("Diese Bestellungen wurden gefunden: ", (current, bestellung) => current + (bestellung.MengeProVpe + $" {bestellung.Bezeichnung} wurden bestellt zu einem Preis von {bestellung.Preis} Euro pro Verpackungseinheit. "));
            return MakeSkillResponse(ergebnis, true);
        }
    }
}
