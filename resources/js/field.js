import DetailField from "./components/DetailField";
import FormField from "./components/FormField";

Nova.booting((app, store) => {
    app.component("detail-enhanced-textarea", DetailField);
    app.component("form-enhanced-textarea", FormField);
});
