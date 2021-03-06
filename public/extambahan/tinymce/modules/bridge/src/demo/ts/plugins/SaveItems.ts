import { Fun } from '@ephox/katamari';

import { getDemoRegistry } from '../buttons/DemoRegistry';

const editor = {
  on: (_s, _f) => { },
  off: (_s, _f) => { },
  isDirty: Fun.always
};

export const registerSaveItems = (): void => {
  getDemoRegistry().addButton('save', {
    type: 'button',
    enabled: true,
    onSetup: (buttonApi) => {
      const editorOffCallback = () => {
        buttonApi.setEnabled(!editor.isDirty());
      };
      editor.on('nodeChange dirty', editorOffCallback);
      return () => editor.off('nodeChange dirty', editorOffCallback);
    },
    onAction: (_buttonApi) => {
      // trigger save (or cancel)
    }
  });
};
